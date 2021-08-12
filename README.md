# WordPress theme for itsaboutpeepl.com

This is a child theme of [Twenty Twenty-One](https://wordpress.org/themes/twentytwentyone/).

## Local development

### Building the CSS files

You will need [Sass](https://sass-lang.com/install) installed on your machine.

Then, to build the CSS files, run the update script:

    script/update

If you want to immediately see your new styles on the live site, run the deploy script:

    script/deploy

Beware, this overwrites the files on the live site, so only do it for minor changes. Anything major should be tested in a local copy of the itsaboutpeepl.com WordPress site instead – see Docker instructions below.

### Running a local copy of itsaboutpeepl.com in Docker

You will need [Docker](https://docs.docker.com/get-docker/) installed on your machine.

Copy `.env.example` (you can also modify any settings here, if you want):

    cp .env.example .env

Start the containers:

    docker-compose up

Install requirements inside the `wordpress` container (as root):

    docker-compose exec wordpress /script/bootstrap

Then set up the WordPress environment (as www-data):

    docker-compose exec -u www-data wordpress /script/update

Assuming you haven’t changed the port variables in your `.env` file, the WordPress site will be accessible at <http://localhost:8000> and PHPMyAdmin will be accessible at <http://localhost:8001>. You can log into the WordPress site with the WordPress Admin username and password in your `.env` file.

### Troubleshooting

If you get an error like `Cannot start service […] Ports are not available: listen tcp 0.0.0.0:8001: bind: address already in use` when running `docker-compose up`, then you may already have a process running on your machine using that port.

For example, if the error mentions port `8001` (as above), and you’re on a Mac, then you can find the PID of the process using that port with:

    lsof -i tcp:8001

To help you debug, you can take the offending PID (in this case, `918`) and see which command initiated the process:

    ps -ww -p 918

To solve the `address already in use` error, you can either kill the process currently using the port, or tell Docker to use a different port for the container(s) you’re trying to launch, by modifying the relevant variable in your copy of the `.env` file.

### Tips for working with the Docker containers

To enter into an interactive shell inside the `wordpress` container, you can run:

    docker-compose exec wordpress bash

To stop the containers, press `ctrl-C` while inside the `docker-compose up` command. If you ran docker in detatched mode instead (`docker-compose up -d`) then you can stop the containers with:

    docker-compose down

To revert all changes made inside the containers, and reset them to their initial state, you can run:

    docker-compose down -v

To completely remove all of the containers from your machine, you can run:

    docker-compose rm -v
