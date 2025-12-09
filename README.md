# Real Estate Investment Platform

A comprehensive multi-tenant SaaS platform connecting property sellers with real estate dealers through a subscription-based marketplace. Built as a Progressive Web App (PWA) with Laravel, featuring real-time notifications, geolocation services, and recurring payment management via Stripe.

## 🎯 Project Overview

This platform streamlines real estate transactions by providing a centralized marketplace where property sellers can list their assets and professional dealers can discover investment opportunities. The subscription model ensures sustainable revenue while offering tiered access to premium features.

## ✨ Key Features

### Multi-Role Dashboard System
- **Seller Dashboard:** Property listing management, dealer inquiries, lead tracking, subscription analytics
- **Dealer Dashboard:** Property search and filtering, saved listings, seller communication, deal pipeline management
- **Super Admin Dashboard:** User management, subscription oversight, revenue analytics, platform configuration

### Stripe Subscription Management
- **Tiered Plans:** Multiple subscription levels with feature differentiation
- **Recurring Billing:** Automated monthly/annual payment processing via Stripe
- **Coupon System:** Promotional codes and discount management
- **Webhook Integration:** Real-time subscription status updates (active, canceled, past_due)
- **Payment History:** Detailed transaction logs and invoice generation
- **Trial Periods:** Free trial functionality with automatic conversion

### Progressive Web App (PWA)
- **Offline Capability:** Service workers for offline data access
- **App-like Experience:** Install to home screen, full-screen mode
- **Push Notifications:** Native-style notifications on desktop and mobile
- **Fast Loading:** Optimized caching strategies for instant page loads
- **Responsive Design:** Seamless experience across all devices

### Real-Time Features
- **Push Notifications:** Instant alerts for new listings, inquiries, and subscription events
- **Live Chat Messaging:** Real-time communication between sellers and dealers
- **Activity Feeds:** Live updates on property status changes
- **Notification Center:** Centralized inbox for all platform communications

### Geolocation & Mapping
- **Google Maps Integration:** Interactive property location mapping
- **Geolocation API:** Automatic location detection and address autocomplete
- **Radius Search:** Find properties within specified distance
- **Location-based Filtering:** Search by city, neighborhood, or coordinates

## 🛠️ Tech Stack

**Backend:** Laravel (PHP), MySQL  
**Payment Processing:** Stripe (Subscriptions, Webhooks, Coupons)  
**PWA:** Service Workers, Web App Manifest  
**Real-time:** Pusher, OneSignal Push Notifications  
**Mapping:** Google Maps API, Geolocation API  
**Frontend:** Blade Templates, JavaScript, jQuery, Bootstrap  
**Tools:** Postman (API testing), Git, Laravel Mix

## 📋 Core Functionalities

### For Property Sellers
- **Listing Creation:** Upload property details, photos, pricing, and location
- **Subscription Management:** Choose plans, upgrade/downgrade, payment history
- **Lead Management:** Track dealer inquiries and communication history
- **Analytics Dashboard:** View listing performance and engagement metrics
- **Document Management:** Upload property documents and legal papers

### For Real Estate Dealers
- **Advanced Search:** Filter by price, location, property type, size
- **Saved Searches:** Store search criteria for automatic new listing alerts
- **Favorites:** Bookmark properties for future reference
- **Subscription Benefits:** Access premium listings based on subscription tier
- **Communication Tools:** Direct messaging with sellers
- **Deal Pipeline:** Track properties from inquiry to closing

### For Administrators
- **Subscription Analytics:** Revenue tracking, churn analysis, MRR/ARR metrics
- **User Management:** Approve/suspend users, manage roles and permissions
- **Content Moderation:** Review and approve property listings
- **Coupon Management:** Create promotional campaigns and track usage
- **Platform Configuration:** Set subscription pricing, feature flags, system settings
- **Stripe Dashboard Integration:** Financial reporting and reconciliation

## 🔐 Security & Compliance

- **PCI Compliance:** Stripe handles all payment data securely
- **Role-based Access Control:** Granular permissions system
- **Data Encryption:** Sensitive information encrypted at rest and in transit
- **CSRF Protection:** Laravel's built-in security features
- **Input Validation:** Comprehensive server-side validation
- **Session Management:** Secure authentication and session handling

## 💳 Subscription Features

### Payment Flow
1. User selects subscription plan
2. Stripe Checkout session created
3. Payment processed securely via Stripe
4. Webhook confirms payment and activates subscription
5. User gains immediate access to plan features

### Webhook Handling
- `customer.subscription.created` - Activate new subscription
- `customer.subscription.updated` - Handle plan changes
- `customer.subscription.deleted` - Process cancellations
- `invoice.payment_succeeded` - Confirm recurring payments
- `invoice.payment_failed` - Handle failed payments and retries

### Coupon System
- Percentage-based discounts
- Fixed amount discounts
- First-time user promotions
- Seasonal campaigns
- Referral bonuses
- Usage limits and expiration dates

## 📱 PWA Capabilities

### Service Worker Features
- Cache property images and data
- Offline fallback pages
- Background sync for form submissions
- Push notification handling

### Manifest Configuration
- Custom app icons and splash screens
- Theme color customization
- Display mode: standalone
- Start URL configuration

## 🗺️ Geolocation Features

- **Address Autocomplete:** Google Places API integration
- **Geocoding:** Convert addresses to coordinates
- **Reverse Geocoding:** Get address from coordinates
- **Distance Calculation:** Calculate property proximity
- **Map Markers:** Custom markers for different property types
- **Info Windows:** Property previews on map interaction

## 🚀 Performance Optimizations

- **Database Indexing:** Optimized queries for large property datasets
- **Eager Loading:** Prevent N+1 query problems
- **Image Optimization:** Lazy loading and responsive images
- **CDN Integration:** Static asset delivery via CDN
- **Caching Strategy:** Redis/Memcached for session and query caching
- **Queue System:** Background job processing for emails and notifications

## 📊 Analytics & Reporting

- Subscription revenue tracking (MRR, ARR, churn rate)
- User engagement metrics
- Property listing performance
- Conversion funnel analysis
- Geographic distribution reports
- Payment success/failure rates

## 🔄 Stripe Webhook Testing

```bash
# Install Stripe CLI for local testing
stripe listen --forward-to localhost:8000/webhook/stripe

# Trigger test events
stripe trigger customer.subscription.created
stripe trigger invoice.payment_succeeded
```

## 📦 Installation & Setup

```bash
# Clone repository
git clone [repository-url]

# Install dependencies
composer install
npm install

# Environment setup
cp .env.example .env
php artisan key:generate

# Configure Stripe keys in .env
STRIPE_KEY=pk_test_xxx
STRIPE_SECRET=sk_test_xxx
STRIPE_WEBHOOK_SECRET=whsec_xxx

# Run migrations
php artisan migrate --seed

# Build PWA assets
npm run production

# Generate PWA manifest
php artisan pwa:generate
```

## 🌐 API Endpoints

- `POST /api/properties` - Create property listing
- `GET /api/properties/search` - Search with filters
- `POST /api/subscriptions/create` - Initialize subscription
- `POST /api/webhook/stripe` - Handle Stripe webhooks
- `GET /api/notifications` - Fetch user notifications
- `POST /api/messages` - Send chat messages

---


