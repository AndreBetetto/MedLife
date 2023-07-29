'use client'

import { type } from "os";
import { createContext } from "react";

type AuthContextData = {
    isAuthenticated: boolean;
}

export const AuthContext = createContext({} as AuthContextData)

// export function AuthProvider({ children }) {
//     const isAuthenticated = false;
//     async function signIn() {
    
//     }
//     return (
//         <AuthContext.Provider value={{ isAuthenticated }}>
//             {children}
//         </AuthContext.Provider>
//     )
// }