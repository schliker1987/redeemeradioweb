Hi there, here's the spec under Ticket to Gold, Disabled to Gold, and Golden Ticket - this project has a strict cap on it at $25.00.- : 

Visit https://www.anonyproxies.com - there are a few things to make happen:

1. Create an auto-deploy section on the page that allows you to automatically deploy the service to a new cloud VPS for a service fee just like the other sections that say Subscribe Now. This needs to be part of the API which is located at https://anonyproxies.com/api/ (django-rest-framework).  The API url mentioned and its functions just needs some configuration to resolve any kind of Internal Server Error and it needs setup to ensure it runs using a database like MySQL (settings can be places in live.py of anonyapi repo located at https://bitbucket.org/anonysurfer/anonyapi/.  The section and the configuration modal that you generate allows the person to at any moment in the future specify custom advertisement javascript code or any javascript code at the top of the A2, Glype, PHProxy, PHProxy++ pages assuming the user is logged in (use a "Config" button that opens up a modal where this can be configured using our API).  The "Config" button and its modal also allows the user to specify if they want their deployment to be part of the mirrors, a DNS domain name option where they can provide a domain name (otherwise we provide them automatically with a domain subdomain of anonyproxies.com and anonyproxi.es [an alias of anonyproxies.com]).  The deployed index.html needs to be completely unlocked on the new server that is deployed only assuming that another configuration option is specified saying "Keep all featured unlocked" (the only other option is "Near exact deployment of SuperHeroFM.com" - which keeps payment functionality continuing once it is deployed).

2. VPN sections need to be configured and a .sh script needs to be generated to automatically setup the VPN and proxy options that are offered on https://anonyproxies.com 

3. Login functionality needs to be setup so that people can login to the /secure/ URL with some kind of secure cookie and also login to the individual sections 

4. PhoneGap application needs to be deployed (the code is already there, just needs to be compiled) with more clear instructions for setting everything up at https://bitbucket.org/anonyproxies/anonygap/ (shall need your email to invite you to the repo) - an .apk file, Apple Store file, Microsoft Store file needs to be generated and uploaded to the PhoneGap repository at https://bitbucket.org/anonyproxies/anonygap/ (can add you to the repo with your email)

5. If logged in to both the anonygap and anonyweb apps from github.com/anonyproxies/ - sections on the page need to show, based on what was paid for in particular whatever VPN or proxy details are necessary to use the application.

6. The application needs to be tested with Stripe and hooked up to my Stripe account.  

7. Develop payment option modifications that are "Pay by the year" on the page.