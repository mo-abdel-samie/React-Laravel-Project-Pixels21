import React from 'react'

function Paragraph(props){

    var reminder = 0,
        secCol   = 0,
        firstCol = 0;

    reminder = (props.content.length)% 2;

    if( reminder === 0 ){
        firstCol = props.content.length / 2;
    }else {
        secCol   = (props.content.length - reminder) / 2;
        firstCol =  secCol +  reminder;
    }

    return(
        <>

            

            <div className="col-lg-6">
                {props.content.map((pg,index) => (

                    (index < firstCol )?
                        <p key={index}> {pg} </p>
                    :
                        null
                    

                ))}
            </div>
            <div className="col-lg-6">
                {props.content.map((pg,index) => (

                    (index >= firstCol)?
                        <p key={index}> {pg} </p>
                    :
                        null
                    
                ))}   
            </div>
        </>

    );
}

export default function Articals(props) {
    return (
        <section className = "articels-content">
            
            {props.articals.map((artical,index) => (
                <div key={index} >
                    <div  id={`sec${index}`} className="container mt-5 pt-5">
                        <div key={artical.id} className="row">
                            <div  className="col-12" >
                                <h2>{artical.title}</h2>
                            </div>
                        </div>
                    </div>

                    <img className = " img-fluid my-5" src={`/images/MagazineImg/articels/${artical.img[0]}`} alt={artical.title} />

                    <div className="container">
                        <div className="row">

                            <Paragraph content={artical.content} />

                        </div>   
                    </div>
                </div>
            ))}

        </section>
    )
}
