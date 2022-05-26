# Slim framework 4 Boilerplate

<div>
  Created by BitByBit team and maintained with ❤️ by an amazing <a href="https://www.hackerearth.com/challenges/hackathon/airbus-aerothon-40-finale/dashboard/1bfeeee/team/">team of developers</a>.
</div><br />

## Prerequisite

- PHP 7.4 or newer : Installation instructions can be found [here.](https://www.php.net/downloads)
- Composer : Installation instructions can be found [here.](https://getcomposer.org/download/)

## Install the Application

Run this command from the root directory of project.

```bash
composer install
```

You'll want to:

- Point your virtual host document root to your new application's `public/` directory.
- Ensure `logs/` is web writable.

To run the application in development, you can run these commands

```bash
cd [my-app-name]
composer start
```

Or you can use `docker-compose` to run the app with `docker`, so you can run these commands:

```bash
cd [my-app-name]
docker-compose up -d
```

After that, open `http://localhost:5000` in your browser.

Run this command in the application directory to run the test suite

```bash
composer test
```

That's it! Now go build something cool.

## Deploy Application

Deployment instruction can be found [here.](https://www.slimframework.com/docs/v4/deployment/deployment.html)
