# Exchange Rates

A basic laravel project, allowing you to add users with job information and an hourly rate, and then view their profile, showing you that rate in other currencies.

The app fetches new exchange rate data once a day, or if it cannot get the latest figures, it defaults to previously stored rates. 

The app will begin with 50 demo user accounts.  This number can be changed in `database/seeders/UserSeeder.php`

<div style="display:flex; width:100%; overflow:hidden; flex-wrap:wrap; justify-content:center;">
    <img src="https://wr-web-dev-projects.s3.eu-west-2.amazonaws.com/github-screenshots/Users.png" width="400px"/>
    <img src="https://wr-web-dev-projects.s3.eu-west-2.amazonaws.com/github-screenshots/User.png" width="400px"/>
</div>

## Requirements

See the [Laravel Project](https://github.com/laravel/laravel) for more Laravel setup instructions.

### Exchange Rates API
This project was built for the [Exchange Rates API](https://exchangeratesapi.io/). 
You'll need to set up a paid account with them to get up-to-date currency conversions.

### Database
You will need to set up a new, empty, MySQL database to store the users and exchange rates information.


## Install

### Environment Variables

Copy the environment variables sample file
```cp .env.sample .env```

Change the following variables to your own values:


    DB_HOST={Db IP Address}
    DB_PORT={Db Port number}
    DB_DATABASE={Db name}
    DB_USERNAME={Db username}
    DB_PASSWORD={Db password}
    EXCHANGE_RATE_API_KEY={Your API key from https://exchangeratesapi.io/}

### Styles

Run `npm run dev` to compile styles using webpack.mix

### Serve

Run `php artisan serve` to begin hosting the app locally for development. 
