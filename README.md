# php-apps

Web Applications developed using HTML &amp; CSS &amp; JS &amp; PHP and using Docker and Docker-Compose to containerize some of these applications.

---

## Applications

- **Marketing:** is a simple front-end application that displays a marketing page for a company.
- **Calculator:** is a simple calculator application that performs basic arithmetic operations using `PHP` and `JavaScript`. _(client-server interaction)_.
- **WebSite_Visits:** is a simple application that counts the number of visits to a website using `nodejs` and `redis`. **Containerized using Docker and Docker-Compose**.
- **CRUD: (Create, Read, Update, Delete)** an application that performs CRUD operations on a database using `PHP` and `MySQL` to **Add/Edit/Delete** users. **Containerized using Docker and Docker-Compose**.
- **Hospitality:** a simple application that reserves a room in a hospital using `PHP` and `MySQL`. **Containerized using Docker and Docker-Compose**.
- **LoginSystem:** a full functional login system that allows users to register and login using PHP and MySQL following the `MVC` _(Model-View-Controller)_ design pattern. **Containerized using Docker and Docker-Compose**.
- **OnlineShop:** an online shop application that allows adding a new product to the shop and displaying all products using `PHP` and `MySQL`. **Containerized using Docker and Docker-Compose**.

---

## Locally Running the Applications

To run the applications locally, you need to have `PHP`, `MySQL`, and `Apache` installed on your machine _(Easy to install using `XAMPP` or `WAMP`)_.

1. Clone the repository.
2. Navigate to the application directory.
3. Copy the application folder to the `htdocs` directory in the `XAMPP` or `WAMP` installation directory.
4. Open your browser and navigate to `http://localhost/application-folder-name` to view the application.
5. To view the database's table, navigate to `http://localhost/phpmyadmin` and create a new database and table.
6. Update the database connection details in the application files to match your database details if needed.

---

## Docker

- **Dockerfile:** is a text document that contains all the commands a user could call on the command line to assemble an image.
- **docker-compose.yml:** is a YAML file that defines how Docker containers should behave in production.

> ✅ To build the application created using Docker, you need to have Docker installed on your machine then:

1. Clone the repository.
2. Navigate to the application directory.
3. Run the following command to build the application:

```bash
docker-compose up
# To remove the container after stopping it
docker-compose down
```

4. Open your browser and navigate to `http://localhost:8080` to view/add the database's table _(`PHPmyAdmin` Dashboard)_.
5. Open your browser and navigate to `http://localhost:80` to view the application.
