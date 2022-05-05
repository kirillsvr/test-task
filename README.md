## Setup

If you are interested in trying this test project, you can do the following.

### Local

1. Clone this repository to your machine.

   ```bash
   git clone -b v3 --depth 1 --single-branch https://github.com/kirillsvr/test-task.git
   ```

2. Run all managed services with Docker Compose, and wait for all containers to run perfectly.

   ```bash
   docker-compose up -d
   ```

3. Go to the php container.

    ```bash
    docker exec -it app bash
    ```

4. Install dependencies.

    ```bash
    composer install
    ```

5. Make migrate.

   ```bash
   php artisan migrate
   ```


If all goes well, you can immediately try opening http://localhost:8886 in the browser.