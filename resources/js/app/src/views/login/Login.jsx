import { useState } from "react";
import {Link} from 'react-router-dom';

export default function Login()
{
    const[message,setMessage]= useState (null)

    return(
        

        <div className="login-signup-form animated fadeInDown">
            <div className= "form">
                <form>
                <h1 className="title margem">Acesso ao Sistema</h1>
                {
                    message &&
                    <div className='alert'>
                        <p>{message}</p>
                    </div>
                }

                <input type="text" placeholder="E-mail" className='margem'/>
                <input type="password" placeholder="Senha"className='margem'/>
                <button className='btn btn-block'>Login</button>
                <p className='message'>Não está Registrado?</p><Link to="/register">Criar nova conta</Link>
                </form>
            </div>
        </div>
    )
}