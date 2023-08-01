import NextAuth, { type NextAuthOptions } from "next-auth"
import CredentialsProvider from "next-auth/providers/credentials"
import Credentials from 'next-auth/providers/credentials';

export const nextAuthOptions: NextAuthOptions = {
    session: {
        strategy: 'jwt'
    },
    providers: [
        CredentialsProvider({
            name: 'Signin',
            credentials: {
                email: { 
                    label: 'email', 
                    type: 'email', 
                    placeholder: 'hello@example.com' 
                },
                password: { 
                    label: 'password', 
                    type: 'password' 
                },
                name: { 
                    label: 'name', 
                    type: 'text' 
                }
            },
            async authorize(credentials) {
                //const response = await fetch('')
                const user = {
                    id: '1',
                    name: 'test',
                    email: 'teste@gmail.com',
                    password: '12345'
                }
                return user;
            }
        })
    ]
}

const handler = NextAuth(nextAuthOptions)
export { handler as GET, handler as POST }