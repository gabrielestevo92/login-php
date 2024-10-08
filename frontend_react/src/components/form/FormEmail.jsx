import './form.css'
import { useState } from "react";
import { useForm } from "react-hook-form";
import axios from 'axios';
import React, { useRef } from 'react';
import Cookies from 'js-cookie';
import FormPassword from './FormPassword';
import { useNavigate } from 'react-router-dom';

const FormEmail = ({ setEmail }) => {
    // recebendo instancia do navigate
    const navigate = useNavigate();

    // Desestruturando o useForm
    const { register, handleSubmit, formState: {errors} } = useForm()

    // Função chamada ao submeter do usuario
    const onSubmitEmail = (event) => {
        
        setEmail(event.email)
        // Cookies.set('email', event.email, { expires: 7 });   
        // Direciona para a pagina de password
        navigate('/password');    
        
    }


    
    return(
        <>
        
        <form onSubmit={handleSubmit(onSubmitEmail)}>
                <h1>Please sign in</h1>
                <input
                    id="email"
                    type="email"
                    placeholder="Email address"    
                    required
                    {...register("email", {
                        required: "O e-mail é obrigatório",                    
                        pattern: {
                        value: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
                        message: "Formato de e-mail inválido"
                        }
                    })}
                    />
                {errors.email && <p>{errors.email.message}</p>}
                <div className="remember-me">
                        <input type="checkbox" id="remember"/>
                        <label htmlFor="remember">Remember me</label>
                    </div>
                <input type="submit" value="Next" id="next" />
            </form>
        </>
    )


}

export default FormEmail;