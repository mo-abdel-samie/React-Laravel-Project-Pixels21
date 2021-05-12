import React from 'react';

function Images(){

    for(let i=1; i<20 ; i++){
        return(
            <div className="col-lg-4 p-2">
                <img src={`images/1.jpg`} className="img-fluid mb-2" alt=""/>
            </div>
        )
    }
}

export default function Galary() {
    

    return (
        <section className="pt-4 gallary">
            <div className="container">
                <h2 className="text-white font-weight-bold">Our Gallery</h2>
                <div className="row justify-content-lg-around">

                    <Images />

                </div>
            </div>
        </section>
    )
}
