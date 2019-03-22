# AKAI Manager
App build with PHP Lumen, MySQL and Vue SPA. Meant for managing things in our student organization. 

## Installation
To install the app you need to do the following;
1. Download this repo, 
2. Go to spa/src and open `main.js`. Here you have window variable mainApiInstance. You need to change baseURL of this array to whatever URL of your API server is going to be, 
3. In the spa/ directory run `npm run dev`. From now on you'll need to keep terminal window with this command running open in order to maintain SPA. Your SPA instance is running on localhost:8080
4. Go to the api/ directory and copy .env.example to .env and fill the file with your config. Remember that you have to give config file database that already exists, base URL of your API and APP_KEY, which may be whatever string you want

