import React, { useEffect, useState } from 'react';
import Aos from "aos";
import axios from 'axios';

export default function Sponsor() {

    const [sponsers, setSponsers] = useState(null);

    useEffect(() => {
        Aos.init({duration: 2000});

        (async () => {
            const { data }  = await axios.get('http://localhost:8000/api/sponsors');
            setSponsers( data.sponsors );
        })();

    }, [])

    return (
        <section className="py-4" style = {{backgroundColor:"#ecf0f1"}}>
            <div className="container">
                <h2 className="text-center">Our Sponsers</h2>
                <div className="row justify-content-around py-5">

                    {
                        sponsers !== null ?
                            
                            sponsers.map((sponser, index)=> (
                                <img key={index} alt={sponser.name} src={`/storage/images/sponser/${sponser.img}`} className="mb-3 mr-2" style={{borderRadius:"50%",width:"80px"}} />
                            ))
                            
                        :
                            "loding..." 
                    }
                    
                </div>
            </div>
        </section>
    )
}
