import { useState } from 'react'
import './App.css'
import Rotas from './routes/Routes'
import { LoginContexto } from './context/ContextProvider'

function App() {

  return (
    <>
      <ContextProvider>
        <Rotas/>
      </ContextProvider>
    </>
      
  )
}

export default App
