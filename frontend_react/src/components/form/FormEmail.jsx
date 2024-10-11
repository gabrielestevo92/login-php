import './form.css'
import '../login/login.css'
import logo from "../../assets/Bootstrap_logo.svg.png"
import { useState } from "react";
import { useForm } from "react-hook-form";
import React, { useRef } from 'react';
import { useNavigate } from 'react-router-dom';
import axios from 'axios';
const FormEmail = ({ setEmail }) => {
    // recebendo instancia do navigate
    const navigate = useNavigate();

    // Desestruturando o useForm
    const { register, handleSubmit, formState: {errors} } = useForm()



    const [data, setData] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    const [ isNewUser, setIsNewUser ] = useState(false)
    

    
    

    // Função chamada ao submeter do usuario
    const onSubmitEmail = async(event) => {
        
        setEmail(event.email)

        const postEmail = {
            "email": event.email
        }
        try {
            const response = await axios.post('http://127.0.0.1:8000/api/autoregister', postEmail);
            
            if (response.data.status) {
                // Se for um novo usuário, redireciona para a página do código
                navigate('/code');
            } else {
                // Se já é um usuário, redireciona para a página de senha
                navigate('/password');
            }
        } catch (err) {
            setError(err.message);
        }
        
        
    }


    
    return(
        <>
        <img src={logo} width={50}/>
        <form onSubmit={handleSubmit(onSubmitEmail)}>
                <h1>Please sign in {error}</h1>
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
            <span>&copy; 2017-2024</span>
        </>
    )


}

export default FormEmail;