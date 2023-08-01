'use client'

import { BrowserRouter, Routes, Route } from 'react-router-dom'
import AddUser from './AddUser'
import EditUser from './EditUser'
import UserList from './UserList'

export default function Throute() {
  return (
    <>
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<UserList />}></Route>
          <Route path="/add" element={<AddUser />}></Route>
          <Route path="/edit/:id" element={<EditUser />}></Route>
        </Routes>
      </BrowserRouter>
    </>
  )
}