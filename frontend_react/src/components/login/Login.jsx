
import React, { useState } from 'react';
import logo from "../../assets/Bootstrap_logo.svg.png"
import './login.css'
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';

import FormEmail from '../form/FormEmail';
import FormPassword from '../form/FormPassword';
import Home from '../home/Home';
import FormRegister from '../form/FormRegister';

const Login = () => {

    // Armazena o email submetido na rota '/'
    const [ email, setEmail ] = useState('')
    const [ code, setCode ] = useState({})
    return(
        
        <div className="container">
            
            <Router>
                <Routes>
                    
                    {/* Rota para inserir o email do usuario */}
                    <Route 
                        path='/'
                        element={<FormEmail setEmail={setEmail} />}
                    />
                    {/* Rota para inserir o codigo enviado por email */}
                    <Route
                        path='/code'
                        element={<FormRegister email={email} />}
                    />
                    <Route
                        path='/password'
                        element={<FormPassword email={email}/>}
                    />
                    <Route
                        path='/home'
                        element={<Home/>}
                    />
                </Routes>
                
            </Router>
        </div>
        
    )
}

export default Login;