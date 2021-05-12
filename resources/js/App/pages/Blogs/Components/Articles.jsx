import React, { useEffect, useState } from 'react'
import Aos from "aos";
import { Link } from 'react-router-dom';
import { axios } from '../../../axios'; 


export default function Articles() {

    const [articles, setArticles] = useState(0);
    const [lastArticle, setLastArticle] = useState(0);

    useEffect(() => {    
        Aos.init({duration: 2000});

        (async () => {
            const { data }  = await axios.get('/articles');
            setArticles( data.articles );
            setLastArticle( data.articles[data.articles.length - 1]);
        })();

    }, []);

    return (
        <section className="articles overflow-hidden">
            <div className = " container">
                <div className="row">
                    <div className="col-12 py-3 pt-5">
                        <div className="pixels-word" style={{top:"-3px"}}>Pixels</div>
                        <h2>Articles</h2>
                    </div>
                    
                    <div data-aos="fade-right" className = "col-lg-6  ">
                        <img alt="pixels articel" src={`/images/${lastArticle.img}`} className = "m-2 img-fluid rounded" />
                    </div>

                    <div data-aos="fade-left" className = "col-lg-6 d-flex pl-5 align-items-center">
                        <div>
                            <h3>{lastArticle.title} </h3>
                            <small>Outher : {lastArticle.outher} </small>
                            <p>
                                {lastArticle.sub_title}
                            </p>
                            <div className = "mt-4">
                                <Link to={`/blog/${lastArticle.id}`} className="btn btn-outline-info rounded-pill">Read More</Link>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="row overflow-hidden py-3">
                    <div className="col-12">
                        <h3>Latest Articles</h3>
                    </div>

                    {(articles !==0 )? 
                        articles.map((article , index)=>(
                            <div key={index} data-aos="fade-up" className="col-lg-4">
                                <div className="card">
                                    <img alt="pixels articel" className="card-img-top" src={`/images/${article.img}`} />
                                    <div className="card-body">
                                        <h5 className="card-title">{article.title}</h5> 
                                        <small>Outher : {article.outher}</small>
                                        <p className="card-text">
                                            {article.sub_title}
                                        </p>
                                        <div className = "mt-4">
                                            <Link to={`/blog/${article.id}`} className="btn btn-outline-info rounded-pill">Read More</Link>
                                        </div>                                    
                                    </div>
                                </div>
                            </div>
                    )) : null }
                    
                </div>

            </div>
        </section>
    )
}
