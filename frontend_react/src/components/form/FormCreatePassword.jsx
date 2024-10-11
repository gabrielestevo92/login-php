import './form.css'
import '../login/login.css'
import logo from "../../assets/Bootstrap_logo.svg.png"
import React, { useEffect, useState } from 'react';
import axios from 'axios';

const FormCreatePassword = ({ email , setCode }) => {

    
    const handleSubmit = async(event) => {


        const postEmail = {
            "email": event.email,
            "password": event.password
        }
        {
            
        }
        try {
            const response = await axios.post('http://127.0.0.1:8000/api/login', postEmail);
            alert(response.data.status)
            
        } catch (err) {
            setError(err.message);
        }
    }



    
    return(
        <>
        <img src={logo} width={50}/>
        <form onSubmit={handleSubmit}>
                <h1>{ email }</h1>
                <input
                    id="password"
                    type="password"
                    placeholder="Password"  
                    
                    required
                    />
                
                <div className="remember-me">
                        <input type="checkbox" id="remember"/>
                        <label htmlFor="remember">Remember me</label>
                    </div>
                <input type="submit" value="Next" id="next" />
            </form>
        </>
    )


}

export default FormCreatePassword;