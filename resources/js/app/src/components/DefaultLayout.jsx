import React from 'react';
import { Link, Navigate, useNavigate } from 'react-router-dom';  
import { useLogin } from '../context/ContextProvider';

export default function DefaultLayout({ children }) {
  const navigate = useNavigate();
  const { token, _setUser, _setToken, user} = useLogin();

  if (!token) {
    return <Navigate to="/login" />;
  }

  const onLogout = (e) => {
    e.preventDefault(); //refresh pagina
    axiosClient.post('/logout' , user.email)
                .then(()=>{
                    _setUser({});
                    _setToken(null);
                    navigate('/login');
                })
                .catch((error)=>{
                    console.log(error)
                })
  }

  return (
    <div id="defaultLayout">
      <aside>
        <Link to="/dashboard"> Dashboard</Link>
        <Link to="/user/index">Usuário</Link>
        <Link to="/editora/index">Editora</Link>
        <Link to="/autor/index">Autor</Link>
        <Link to="/livro/index">Livro</Link>
      </aside>

      <div className="content">
        <header>
          <div className="header">
            Sistema de Controle de Livros
          </div>
          <div>
            Bruna &nbsp; &nbsp;
            <a onClick={onLogout} className="btn-logout" href="#">Logout</a>
          </div>
        </header>
        <main>
          {children}
        </main>
      </div>
    </div>
  );
}
