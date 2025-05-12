import { useState, createRef } from "react";
import {Link} from 'react-router-dom';
import axiosClient from '../../axiosClient';

export default function Login()
{
    const emailRef = createRef();
    const passwordRef = createRef();

    const[message,setMessage]= useState (null)

    const onSubmit=(e) =>{
        e.preventDefault();

        const login = {
            email: emailRef.current.value,
            password:passwordRef.current.value
        }
        
        axiosClient.post('/login', login)
                   .then(({data}) => {
                    console.log(data);
                    localStorage.setItem('TOKEN', data.access_token);
                   })
                   .catch((erro)=>{
                    console.log(erro);
                   })

        setMessage('Login Realizado com Sucesso');
    }

    return(

        <div className="login-signup-form animated fadeInDown">
            <div className= "form">
                <form onSubmit={onSubmit}>
                <h1 className="title margem">Acesso ao Sistema</h1>
                {
                    message &&
                    <div className='alert'>
                        <p>{message}</p>
                    </div>
                }

                <input type="text" 
                       placeholder="E-mail" 
                       className='margem'
                       ref={emailRef}/>
                <input type="password" 
                       placeholder="Senha"
                       className='margem'
                       ref={passwordRef}/>
                <button type="submit"
                    className='btn btn-block'>Login</button>
                <p className='message'>Não está Registrado?</p><Link to="/register">Criar nova conta</Link>
                </form>
            </div>
        </div>
    )
}