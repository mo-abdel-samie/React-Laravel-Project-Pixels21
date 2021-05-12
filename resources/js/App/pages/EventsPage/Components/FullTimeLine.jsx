import React, { useEffect, useState } from 'react';
import  Aos  from 'aos';
import { axios } from '../../../axios';
import { Link } from 'react-router-dom';


function RightBlock(props){
    let event = props.event;

    return(
        <div key={event.index} data-aos="flip-left" className="row justify-content-end">
            <div className="col-lg-6 border-left border-main-color position-relative">
                <div className="year-right">{event.year}</div>
                <i className=" bolet-right"></i>
                <div className="content-wrapper m-2 box-right">
                    <div className="news-card">
                        <Link to="#" className="news-card__card-link"></Link>
                        <img src={`/images/${event.img}`}   alt="Pixels Articals" className="news-card__image"/>
                        <div className="news-card__text-wrapper">
                            <h2 className="news-card__title">{event.name}</h2>
                            <div className="news-card__details-wrapper">
                                <p className="news-card__excerpt">
                                    {event.description}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

function LeftBlock(props){
    let event = props.event;
    return(
        <div key={event.index} data-aos="flip-right" className="row ">
            <div className="col-lg-6 border-right border-main-color position-relative">
                <div className="year-left">{event.year}</div>
                <i className=" bolet-left"></i>
                <div className="content-wrapper m-2 box-left">
                    <div className="news-card">
                        <Link to="#" className="news-card__card-link"></Link>
                        <img src={`/images/${event.img}`}  alt="Pixels Articals" className="news-card__image"/>
                        <div className="news-card__text-wrapper">
                            <h2 className="news-card__title">{event.name}</h2>
                            <div className="news-card__details-wrapper">
                                <p className="news-card__excerpt">
                                    {event.description}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}


export default function TimeLine() {

    const [events, setEvents] = useState(null);


    useEffect(() => {
        Aos.init({duration: 2000});

        (async () => {
            const { data }  = await axios.get('/get-events');
            setEvents( data.events );
        })();

    }, [])



    return (
        <section className="timeline">
                <div className="container">
                    <h2>Pixels Events</h2>

                    {console.log(events)}

                    {
                        events !== null ?
                            events.map((event , index)=>(
                                index%2 === 0?
                                    <LeftBlock event = {event} key = {index}/>
                                :
                                    <RightBlock event = {event} key = {index}/>
                            ))
                        :
                        "Lodding..."
                    }


                </div>
            </section>
    )
}
