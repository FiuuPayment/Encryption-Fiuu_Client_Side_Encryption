# 🔐 Encryption-Fiuu Client Side Encryption

A secure payment processing application that implements client-side encryption for credit card data using Razer Merchant Services (RMS) Client Side Encryption (CSE) API.

## 📋 Overview

This project demonstrates a secure checkout form that encrypts sensitive credit card information on the client side before transmission to the payment processor. The application uses Razer Merchant Services' CSE API to ensure that sensitive payment data is encrypted before leaving the user's browser.

## ✨ Features

- 🔒 **Client-Side Encryption**: Credit card data is encrypted using RSA public key encryption before transmission
- 💳 **Secure Payment Processing**: Integration with Razer Merchant Services payment gateway
- 📱 **Responsive Design**: Bootstrap-based UI for mobile and desktop compatibility
- ✅ **Form Validation**: Client-side validation for credit card fields
- 🧪 **Sandbox Environment**: Configured for testing with Razer's sandbox environment

## 📁 Project Structure

```
Encryption-Fiuu_Client_Side_Encryption/
├── css/
│   ├── bootstrap.min.css    # Bootstrap CSS framework
│   └── style.css           # Custom styling
├── images/
│   └── visaMaster.png      # Payment method icons
├── index.html              # Main checkout page
├── process.php             # Payment processing backend
└── README.md               # This file
```

## 📄 Files Description

### 🌐 `index.html`
The main checkout page containing:
- Order summary table
- Payment method selection
- Credit card input form with client-side encryption
- Bootstrap modal for payment details
- JavaScript integration with Razer CSE API

### ⚙️ `process.php`
Backend payment processing script that:
- Generates unique order IDs
- Prepares payment parameters
- Makes API calls to Razer Merchant Services
- Handles payment response and redirection

### 🎨 `css/style.css`
Custom styling for:
- Order table formatting
- Payment form styling
- Responsive design elements
- Timer and UI components

## 🚀 Setup Instructions

### 📋 Prerequisites
- 🌐 Web server with PHP support
- 💳 Razer Merchant Services account
- 🔒 SSL certificate (recommended for production)

### 🔧 Installation

1. **📥 Clone or download the project files**
   ```bash
   git clone <repository-url>
   cd Encryption-Fiuu_Client_Side_Encryption
   ```

2. **⚙️ Configure Razer Merchant Services**
   - Sign up for a Razer Merchant Services account
   - Obtain your Merchant ID and Verification Key
   - Get your RSA public key for client-side encryption

3. **🔑 Update Configuration**
   
   In `index.html`, replace the placeholder public key:
   ```javascript
   var pub = "-----BEGIN PUBLIC KEY-----<YOUR_ACTUAL_PUBLIC_KEY>-----END PUBLIC KEY-----";
   ```
   
   In `process.php`, update the merchant credentials:
   ```php
   $merchantID = "<YOUR_MERCHANT_ID>";
   $vkey = "<YOUR_VERIFICATION_KEY>";
   ```

4. **🌍 Environment Configuration**
   
   For **🧪 Sandbox/Testing**:
   - Use: `https://sandbox.merchant.razer.com/RMS/API/cse/checkout.js`
   - API URL: `https://sandbox.merchant.razer.com/MOLPay/API/Direct/1.4.0/index.php`
   
   For **🚀 Production**:
   - Use: `https://pay.merchant.razer.com/RMS/API/cse/checkout.js`
   - API URL: `https://pay.merchant.razer.com/MOLPay/API/Direct/1.4.1/index.php`

5. **📤 Deploy to Web Server**
   - Upload all files to your web server
   - Ensure PHP is enabled
   - Configure SSL certificate for secure transmission

## 💻 Usage

1. **🌐 Access the Application**
   - Navigate to `index.html` in your web browser
   - Review the order summary

2. **💳 Make Payment**
   - Click on the credit card payment option
   - Fill in the payment form:
     - Credit Card Number (PAN)
     - CVV
     - Expiry Date (MM/YYYY)
   - Click "Pay" to process the payment

3. **⚡ Payment Processing**
   - Credit card data is encrypted client-side
   - Encrypted data is sent to Razer Merchant Services
   - Payment is processed securely
   - User is redirected based on payment result

## 🔒 Security Features

- 🔐 **Client-Side Encryption**: Sensitive data is encrypted before transmission
- 🔑 **RSA Public Key Encryption**: Uses industry-standard encryption
- 🚫 **No Plain Text Storage**: Credit card data never exists in plain text
- 🌐 **Secure Transmission**: All data transmission uses HTTPS
- ✅ **PCI DSS Compliance**: Helps meet payment card industry standards

## 🔌 API Integration

### 💳 Razer Merchant Services CSE API

The application integrates with Razer's Client Side Encryption API:

- 📚 **Encryption Library**: `checkout.js` handles client-side encryption
- 🔑 **Public Key**: RSA public key for encrypting sensitive data
- 📝 **Form Fields**: PAN, CVV, and expiry date are encrypted
- 📤 **Submission**: Encrypted form data is submitted to payment processor

### 📊 Payment Parameters

Key parameters sent to Razer Merchant Services:
- 🏪 `MerchantID`: Your merchant identifier
- 🔢 `ReferenceNo`: Unique order reference
- 💰 `TxnAmount`: Transaction amount
- 🌍 `TxnCurrency`: Currency code (MYR)
- 💳 `CC_PAN`: Encrypted credit card number
- 🔒 `CC_CVV2`: Encrypted CVV
- 📅 `CC_MONTH`: Encrypted expiry month
- 📅 `CC_YEAR`: Encrypted expiry year

## 🎨 Customization

### 🎨 Styling
- Modify `css/style.css` for custom styling
- Update Bootstrap classes in `index.html` for layout changes
- Replace `images/visaMaster.png` with your payment method icons

### 💳 Payment Flow
- Update order details in `index.html`
- Modify payment parameters in `process.php`
- Customize success/failure handling

### 📝 Form Fields
- Add additional encrypted fields using `data-encrypted-name` attribute
- Update PHP processing to handle new fields
- Modify validation rules as needed

## 🧪 Testing

### 🧪 Sandbox Environment
- Use Razer's sandbox environment for testing
- Test with various credit card numbers
- Verify encryption and decryption processes
- Test error handling scenarios

### 💳 Test Credit Cards
Use Razer's provided test credit card numbers for sandbox testing.

## 🚀 Production Deployment

### 🔒 Security Checklist
- [ ] Replace sandbox URLs with production URLs
- [ ] Update merchant credentials
- [ ] Implement proper SSL certificate
- [ ] Configure secure return URLs
- [ ] Test with real payment scenarios
- [ ] Implement proper error handling
- [ ] Add logging and monitoring

### ⚡ Performance Optimization
- Minify CSS and JavaScript files
- Optimize images
- Implement caching strategies
- Monitor API response times

## 🔧 Troubleshooting

### ❗ Common Issues

1. **🔐 Encryption Errors**
   - Verify public key format
   - Check JavaScript console for errors
   - Ensure CSE library is loaded correctly

2. **💳 Payment Failures**
   - Verify merchant credentials
   - Check API endpoint URLs
   - Review error messages in response

3. **✅ Form Validation Issues**
   - Check credit card number format
   - Verify CVV length requirements
   - Ensure expiry date format (MM/YYYY)

## 🆘 Support

For technical support:
- 📚 Razer Merchant Services Documentation
- 📞 Contact Razer Merchant Services support
- 🔍 Review API documentation for latest updates

## 📄 License

This project is provided as-is for educational and development purposes. Please ensure compliance with Razer Merchant Services terms and conditions.

## 🤝 Contributing

1. 🍴 Fork the repository
2. 🌿 Create a feature branch
3. ✏️ Make your changes
4. 🧪 Test thoroughly
5. 📤 Submit a pull request

## 📝 Changelog

### Version 1.0
- 🚀 Initial implementation
- 🔐 Client-side encryption integration
- 💳 Razer Merchant Services API integration
- 📱 Bootstrap-based responsive design
