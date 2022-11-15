# ZUPPORTS interview project
Responsive web application to show the list of **Restaurants** by using Google Map API which users can enter a keyword to search, default the keyword to **Bang sue**

## Download the repository to your local
`git clone https://github.com/witchayut-k/zupports-test.git`

## Start Backend API project
- `cd api` Get in to backend api project
- `composer install` Install dependency packages
- `php artisan key:generate` Generate .env file
- `php artisan serve` Lanuch the api on http://localhost:8000

## Start Frontend project
- `cd app` Get in to frontend app project
- `yarn install` or `npm install` Install dependency packages
- `yarn dev` or `npm run dev` Lannch the app on http://localhost:3000
- If you didn't use http://localhost:8000 for backend api launch, please update **API_URL** in `app/.env` to your endpoint

## Please don’t hesitate to contact me if you have any questions.
