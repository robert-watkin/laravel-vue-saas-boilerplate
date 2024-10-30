## Laravel & Vue SaaS Boilerplate

Hi, I have created this boilerplate for Laravel and Vue to increase the speed in which I can develop SaaS products as a solo developer. I thought this could be useful to others who use the Laravel and Vue stack (Inertia) and want to create SaaS products without having to implement the same features everytime. This boilerplate aims to cover the basic feature set and UI required to start developing a SaaS product meaning you can focus on the important parts of your SaaS idea. Any and all feedback is appreciated :)

This boilerplate is based of the Jetstream starter kit so you get all the benefits provided such as a profile screen, session management, 2FA, etc.

![image](https://github.com/user-attachments/assets/b61e2b20-5ec7-4e21-bd14-2823a21e515a)


### Technologies Used
- Laravel
- Vue JS
- Inertia JS
- Daisy UI (Themes)
- Stripe
- Mailgun

Anything within this boilerplate including technologies chosen are of course intended to modified to fit your SaaS idea while acting a starting point to hopefully save some early development time.

## Getting Started

I work with laravel locally with WSL 2 (Windows Subsystem for Linux) running Ubuntu therefore the following instructions will be based on that development setup. You should still be able to use the boilerplate with a different development setup but certain instructions will not apply. I use Laravel Sail to run my local development server. See a link to Laravel Sail documentation below:
[Laravel Sail Docs](https://laravel.com/docs/11.x/sail)

1. Clone the github repository
Navigate to the Github repository and click on the "code" dropdown to see clone options. To clone with SSH, within WSL run the following on the command
```
git clone git@github.com:RobertWatkin/laravel-vue-saas-boilerplate.git
```

2. Copy .env.example to .env and fill in appropriate fields
For now ensure you fill in at least a database username and password
```
cp .env.example .env
```

3. As per sail documentation "Installing Composer Dependencies for Existing Applications"
This will allow you to run the sail command
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
``` 

4. Start the container in detached mode
```
sail up -d
```

5. Install composer dependencies inside the container and generate app key
```
sail composer update && sail composer install && sail npm install && sail artisan key:generate
```

6. Database Migation
```
sail artisan migrate
```

7. Setup Stripe (Refer to Laravel Cashier section further down)
8. Setup Email verification (Refer to Setup Email  section further down)
9. Start up the app
if you have already started your docker container and you have made any changes to the .env file then it is worth stopping it at this point
```
sail down
```
then start it up again and watch for changes with npm
```
sail up -d && sail npm run dev
```

10. Visit localhost.
Your site should now be running on localhost
```
http://localhost
```
   

## Landing Page Components

Welcome.vue is the landing page for the application. The landing page is made up of some Vue components. Feel free to modify or remove components as you see fit

![image](https://github.com/RobertWatkin/laravel-vue-saas-boilerplate/assets/55134916/d2c52cfb-a5c0-464c-9e62-bcddce645944)


## Realtime Colors
![saas-boilerplate](https://github.com/user-attachments/assets/53c93b58-46d0-42c7-93de-587a8a87ee97)

To create your own color scheme I recommend the use of www.realtimecolors.com/
Create a colour scheme you like and then export the colour scheme with the custom export code below
```
daisyui: {
    themes: [
      {
        realtimeColorsTheme: {
          "primary": "${primary.hex}",
          "primary-content": "${primaryFg.hex}",
          "secondary": "${secondary.hex}",
          "secondary-content": "${secondaryFg.hex}",
          "accent": "${accent.hex}",
          "accent-content": "${accentFg.hex}",
          "neutral": "${bg.hex.15}",
          "base-100": "${bg.hex}",
        },
      },
    ],
  },
```

You can then paste the exported theme into your tailwind.config.js file as seen below:
![image](https://github.com/user-attachments/assets/bc816c50-183e-4e59-b362-d3a7facbac3d)


#### DaisyUI Themes
See the full documentation for Daisy UI below:
https://daisyui.com/

If you don't want to create your own color schemes, it is super simple to get started with themes within the boilerplate. Daisy UI themes are based on Tailwind CSS config. Within tailwind.config.js you will find all of the DaisyUI themes. Simply uncomment the one you want to use and comment all others. The file also contains some commented out examples of completelly custom colour themes should you decide you want more optionality.

![image](https://github.com/RobertWatkin/laravel-vue-saas-boilerplate/assets/55134916/7677810b-e79a-4265-b9d8-e18a9351a1a4)



## Animations

The application also uses animations from @vueuse/motion. These can be seen on the landing page when sections of the page are scrolled to be in view.
https://motion.vueuse.org/

See an example usage below taken from Feature.vue:
![image](https://github.com/RobertWatkin/laravel-vue-saas-boilerplate/assets/55134916/4d876cd6-fa97-410c-a628-ec9852998564)


## Setup Email (Mailgun)

1. Sign into mailgun or create an account if required
https://www.mailgun.com/pricing/
2. Update the .env variables for mailgun
The fields you need to update are below and can be found on your mailgun account:
```
MAILGUN_DOMAIN=
MAILGUN_SECRET=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_FROM_ADDRESS="saas-boilerplate@example.com"
```
![image](https://github.com/RobertWatkin/laravel-vue-saas-boilerplate/assets/55134916/9ac5d3d8-1a50-44e9-b44d-153c599d81ce)

Once your variables are set you should receive a verification email when registering a new account in the application. You can also use Mailgun to send mail throughout your application. 
Refer to the Laravel documentation on mail for more information:
https://laravel.com/docs/11.x/mail

## Stripe Setup (Laravel Cashier)

Laravel Cashier is the official method for implementing Stripe into a Laravel application. See the full documentation for Laraval Cashier below:
https://laravel.com/docs/11.x/upgrade#cashier-stripe

Laravel Cashier allows the implementation of a pricing page and subscription checkout flow as expected from a SaaS product. The pricing options can be toggled between Monthly or Yearly billing. Once again this is all customisable so, if for example you only have monthly billing for your application, feel free to remove or add anything as you see fit.
![image](https://github.com/RobertWatkin/laravel-vue-saas-boilerplate/assets/55134916/7dc8df65-a137-4d05-882f-81e2ddab4422)

1. Sign into or create Stripe account
https://dashboard.stripe.com/register

2. Setup .env variables
The three .env variables you need to set are listed below, you can find these variables in your Stripe account:
```
STRIPE_KEY=
STRIPE_SECRET=
STRIPE_WEBHOOK_SECRET=
```
![image](https://github.com/RobertWatkin/laravel-vue-saas-boilerplate/assets/55134916/45323234-a407-4ed4-89c7-9397b2c68861)

3. Creating stripe products
The boilerplate is set to handle 3 products with Monthly and Yearly pricing options. The front end can handle if you choose to only supply Monthly or Yearly options on their own providing you remove the pricing tier you do not require from the config.
To create the pricing tiers on stripe navigate to your product catalogue and click 'Add product'. Give the product a name and add the Monthly and/or Yearly pricing.

Below you can see how I have this setup on Stripe after creating the products for both Monthly and Yearly options. The products are named 'price_starter', 'price_basic' and 'price_plus'. Feel free to use this naming convension
![image](https://github.com/RobertWatkin/laravel-vue-saas-boilerplate/assets/55134916/eba95bd4-c290-48f6-8277-b8f6305a8444)


Below you can see what 'price_starter' looks like with my two payment periods listed:
![image](https://github.com/RobertWatkin/laravel-vue-saas-boilerplate/assets/55134916/13bd1bff-7ccc-41aa-a8b7-f7f7cd0950e2)

You get the price id's for each price tier by clicking on the Monthly/Yearly row that you see in the image above which you will require in your inertia config

4. Add pricing to inertia config
In the application code, open the file 'app/Http/Middleware/HandleInertiaRequests.php'. You will see most of this file contains config for the pricing details.
Here you can set the names of your pricing tiers, match the prices up to the ones created on Stripe and list the features present within each price tier. This data is used mainly to populate the pricing page and also as a reference for the subscription details in the users profile page when they have an active subscription.

You MUST ensure the stripe_id is set correctly for each of your pricing tiers or Stripe you won't be directed to the Stripe checkout as expected.
When you think you have your config setup correctly, move onto the next step where you can test your Stripe setup is successful.

### Stripe Testing in Local Environment

1. Activate customer portal for test mode
https://docs.stripe.com/no-code/customer-portal?locale=en-GB

2. Listen to webhooks for localhost testing checkout process
Install stripe CLI tool in your environment
https://docs.stripe.com/stripe-cli

Sign into the stripe CLI
```
stripe login
```

Listen to webhooks
```
stripe listen --forward-to http://localhost/stripe/webhook
```
You must copy the stripe webhook signing secret that is displayed on your screen to your .env for testing. 
Everything is working when you are receiving 200 responses during the checkout process and the database is correctly adding subscription data for customers.




