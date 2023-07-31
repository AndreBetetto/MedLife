import { BrowserRouter, Router, Route } from 'react-router-dom'
import AddUser from './components/User/AddUser.jsx'
import UserList from './components/User/UserList.jsx'

export default function App() {
    return (
        <div className="container max-w-2xl">
            <BrowserRouter>
                <Routes>
                    <Route path="/" element={<UserList />}></Route>
                    <Route path="/add" element={<AddUser />}></Route>
                </Routes>
            </BrowserRouter>
        </div>
    )
}