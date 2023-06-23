const router = require('express').Router();
const paypal = require('paypal-rest-sdk');
const paypalConfig = require('../config/paypal');

paypal.configure(paypalConfig);

// Endpoint pour créer une réservation
router.post('/reservations', async (req, res) => {
    // Récupérer les informations de la réservation depuis le corps de la requête
    const { startDate, endDate, price, currency, description, propertyId } = req.body;
  
    try {
      // Créer une commande PayPal
      const createPaymentJson = {
        intent: 'sale',
        payer: {
          payment_method: 'paypal'
        },
        redirect_urls: {
          return_url: 'http://localhost:3000/success',
          cancel_url: 'http://localhost:3000/cancel'
        },
        transactions: [{
          item_list: {
            items: [{
              name: 'Réservation de logement',
              sku: 'reservation',
              price: price,
              currency: currency,
              quantity: 1
            }]
          },
          amount: {
            currency: currency,
            total: price
          },
          description: description
        }]
      };
      const payment = await paypal.payment.create(createPaymentJson);
  
      // Enregistrer la commande PayPal dans la base de données
      const insertPaymentQuery = `
        INSERT INTO payments (id_payment, id_logement, id_service, start_date, end_date, price, currency, description, status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
      `;
      const insertPaymentValues = [
        payment.id_payment,
        logementId,
        serviceId,
        startDate,
        endDate,
        price,
        currency,
        description,
        'created'
      ];
      connection.query(insertPaymentQuery, insertPaymentValues, (err, result) => {
        if (err) {
          console.error(err);
          return res.status(500).json({ error: 'Erreur lors de l\'enregistrement du paiement.' });
        }
  
        // Renvoyer l'URL de paiement PayPal à l'utilisateur
        res.status(200).json({ paymentUrl: payment.links.find(link => link.rel === 'approval_url').href });
      });
  
    } catch (error) {
      console.error(error);
      res.status(500).json({ error: 'Erreur lors de la création de la commande PayPal.' });
    }
  });
  
  // Endpoint pour gérer le retour de PayPal après le paiement
  router.get('/success', async (req, res) => {
    const payerId = req.query.PayerID;
    const paymentId = req.query.paymentId;
  
    try {
      // Récupérer le paiement depuis PayPal
      const payment = await paypal.payment.get(paymentId);
  
      // Mettre à jour la base de données pour marquer le paiement comme réussi
      const updatePaymentQuery = `
        UPDATE payments SET status = 'completed', payer_id = ?
        WHERE id_payment = ? AND status = 'created'
      `;
      const updatePaymentValues = [
        payerId,
        payment.id_payment
      ];
      connection.query(updatePaymentQuery, updatePaymentValues, async (err, result) => {
        if (err || result.affectedRows === 0) {
          console.error(err);
          return res.status(500).json({ error: 'Erreur lors de la mise à jour du paiement.' });
        }
  
        // Mettre à jour la base de données pour marquer la réservation comme payée
        const updateReservationQuery = `
          UPDATE reservations SET paid = ?
          WHERE id_logement = ? AND start_date = ? AND end_date = ?
        `;
        const updateReservationValues = [
          true,
          payment.transactions[0].item_list.items[0].sku,
          new Date(payment.transactions[0].item_list.items[0].name.split(' ')[3]),
          new Date(payment.transactions[0].item_list.items[0].name.split(' ')[5])
        ];
        connection.query(updateReservationQuery, updateReservationValues, (err, result) => {
          if (err || result.affectedRows === 0) {
            console.error(err);
            return res.status(500).json({ error: 'Erreur lors de la mise à jour de la réservation.' });
          }
  
          // Renvoyer une réponse de succès à l'utilisateur
          res.status(200).json({ message: 'Le paiement a été effectué avec succès.' });
        });
      });
  
    } catch (error) {
      console.error(error);
      res.status(500).json({ error: 'Erreur lors de la récupération du paiement PayPal.' });
    }
  });
  
  // Endpoint pour gérer l'annulation du paiement PayPal
  router.get('/cancel', (req, res) => {
    res.status(500).json({ error: 'Paiement annulé.' });
  });

module.exports = router;