import React from 'react'
import {Route, Routes} from 'react-router-dom';
import UserFormList from '../views/user/UserFormList';
import UserFormStore from '../views/user/UserFormStore';
import UserFormShow from '../views/user/UserFormShow';
import UserFormDestroy from '../views/user/UserFormDestroy';
import UserFormUpdate from '../views/user/UserFormUpdate';

const Rotas = () => {
  return (
    <Routes>
        <Route path='user/index' element={<UserFormList/>} />
        <Route path='user/store' element={<UserFormStore/>} />
        <Route path='user/show/:id' element={<UserFormShow />} />
        <Route path='user/destroy/:id' element={<UserFormDestroy/>} />
        <Route path='user/update/:id' element={<UserFormUpdate/>} />


    </Routes>
  )
}

export default Rotas