import { PrismaClient } from '@prisma/client'
const prisma = new PrismaClient()

export const getUser = async (req, res) => {
    try {
        const response = await prisma.user.findMany()
        res.status(200).json(response)
    } catch (error) {
        res.status(500).json({ msg: error.message })
    }
}

export const getUserById = async (req, res) => {
    try {
        const response = await prisma.user.findUnique({
            where: {
                id: Number(req.params.id),
            },
        })
        res.status(200).json(response)
    } catch (error) {
        res.status(404).json({ msg: error.message })
    }
}

export const createUser = async (req, res) => {
    const { name, price } = req.body
    try {
        const product = await prisma.product.create({
            data: {
                name: name,
                price: price,
            },
        })
        res.status(201).json(product)
    } catch (error) {
        res.status(400).json({ msg: error.message })
    }
}

export const updateUser = async (req, res) => {
    const { name, price } = req.body
    try {
        const product = await prisma.product.update({
            where: {
                id: Number(req.params.id),
            },
            data: {
                name: name,
                price: price,
            },
        })
        res.status(200).json(product)
    } catch (error) {
        res.status(400).json({ msg: error.message })
    }
}

export const deleteUser = async (req, res) => {
    try {
        const product = await prisma.product.delete({
            where: {
                id: Number(req.params.id),
            },
        })
        res.status(200).json(product)
    } catch (error) {
        res.status(400).json({ msg: error.message })
    }
}