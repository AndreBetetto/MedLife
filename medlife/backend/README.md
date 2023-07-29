Using Prisma

# Full-stack CRUD with Prisma, Express and React

This project is a full-stack CRUD (create, read, update, delete) application using [Prisma](https://www.prisma.io/), [Express](https://expressjs.com), and [React](https://reactjs.org)

## Back-End

```bash
cd backend
```

copy the `.env.example` file to `.env`

```
APP_PORT=5000
DATABASE_URL="mysql://root:123456@localhost:3306/prisma-react"
```

Install dependencies

```bash
npm install
```

Generate the Prisma Client

```
npx prisma generate
```

Migrate Database with Prisma

```
npx prisma migrate dev
```

Start the server

```bash
npm start
```

Your express server will now be running on port 5000. You can visit [http://localhost:5000](http://localhost:5000) in your web browser to verify that the server is working correctly.