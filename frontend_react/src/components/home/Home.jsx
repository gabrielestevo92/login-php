import React, { useEffect, useState } from 'react';
import logo_black from "../../assets/bootstrap_black.png"
import axios from 'axios';
import { useNavigate } from 'react-router-dom';
const Home = () => {
    const navigate = useNavigate();
    const [user, setUser] = useState({})

    const token = sessionStorage.getItem('token');
    const [sessionTime, setSessionTime] = useState(0);

    const handleLogout = async(user) => {
        
        try{
            sessionStorage.removeItem('loginTime');
            sessionStorage.removeItem('token');
            
            const response = await axios.post(`http://127.0.0.1:8000/api/logout/${user.id}`, null , {
                headers: {
                    Authorization: `Bearer ${token}`  // Incluindo o token no header
                }
            });    
            navigate('/')
    
        }
        catch(err){
            navigate('/')
        }
    }

    useEffect(() => {
        const fetchUserData = async () => {
            try{
                const response = await axios.get('http://127.0.0.1:8000/api/user', {
                    headers: {
                        Authorization: `Bearer ${token}` // Incluindo o token no header
                    }
                });
                setUser(response.data.user)
            }
            catch(err){
                navigate('/')
            }
        }
        fetchUserData();
    }, [token]);


    useEffect(() => {
        let loginTime = sessionStorage.getItem('loginTime')

        if (!loginTime){
            loginTime = new Date().toISOString();
            sessionStorage.setItem('loginTime', loginTime);
        }
        const time = new Date(loginTime).toLocaleString()
        const format = time.replace(',', ' às');
        setSessionTime(format)
    },[])

    
   

    return(
        
        <>
            <div className="header">
            <img src={logo_black} width={50}/> Starter Template
            <hr/>
            </div>
            <div className="main">
                <h1>Bem vindo, {user.name} </h1>

                <p>Você está conectado desde {sessionTime ? sessionTime : "Carregando..."}</p>

                <button onClick={() => handleLogout(user)}>Sair</button>
            </div>
            
        </>
    )
}

export default Home;