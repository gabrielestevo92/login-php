
import React, { useState } from 'react';
import logo from "../../assets/Bootstrap_logo.svg.png"
import './login.css'
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import Form from "../form/Form";
import FormEmail from '../form/FormEmail';
import FormPassword from '../form/FormPassword';

const Login = () => {

    // Armazena o email submetido na rota '/'
    const [ email, setEmail ] = useState('')

    return(
        
        <div className="container">
            <img src={logo} width={50}/>
            <Router>
                <Routes>
                    {/* Rota para inserir o email do usuario */}
                    <Route 
                        path='/'
                        element={<FormEmail setEmail={setEmail} />}
                    />
                    {/* Rota para inserir o password do usuario */}
                    <Route
                        path='/password'
                        element={<FormPassword email={email}/>}
                    />
                </Routes>
            </Router>
            <span>&copy; 2017-2024</span>
        </div>
        
    )
}

export default Login