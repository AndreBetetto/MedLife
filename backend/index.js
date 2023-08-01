import express from 'express'
import cors from 'cors'
import dotenv from 'dotenv'
<<<<<<< HEAD
import ProductRoute from './routes/UserRoute.js'
=======
import ProductRoute from './routes/ProductRoute.js'
>>>>>>> 58d6fc2800932b016b150865d7b8069a61fafe57
dotenv.config()

const app = express()
const port = process.env.APP_PORT || 5000

app.use(cors())
app.use(express.json())
app.get('/', (req, res) => {
<<<<<<< HEAD
    res.send('Hello World!')
})
app.use(UserRoute)
=======
    res.send('Running server!')
})
app.use(ProductRoute)
>>>>>>> 58d6fc2800932b016b150865d7b8069a61fafe57

app.listen(port, () => {
    console.log(`Server listening on port ${port}`)
})

export default app
