import React, { useEffect, useState } from 'react'
import { useParams } from 'react-router-dom';
import Header from './Header';
import  Aos  from 'aos';
import { axios } from '../../../axios';

export default function Blog() {

    let { id } = useParams();
    const [article, setArticle] = useState(null);

    useEffect(() => {
        Aos.init({duration: 2000});

        (async () => {
            let object = {
                id : id
            }
            const { data }  = await axios.post('/article-by-id',object);
            setArticle( data.article );
        })();

    }, []);


    return (
        <>
            <Header />

            {

                article !==null?
                <div className=" container pt-5">
                    <div className="row">
                        <div className="col-lg-8">
                            <div className="project_main_details">
                                <h2>{article.title}</h2>
                                <small>{article.outher}</small>
                                <p className="mb-3">
                                    {article.sub_title}
                                </p>

                                {article.img !== null?
                                    <img src={`/storage/images/${article.img}`} className="img-fluid my-2" alt="pixels-project" />
                                    :
                                    null
                                }

                                {article.video_link !== null?
                                    <div className="embed-responsive embed-responsive-16by9 mb-3">
                                        <iframe className="embed-responsive-item" src={article.video_link} allowFullScreen></iframe>
                                    </div>
                                    :
                                    null
                                }

                                <p>
                                    {article.body}
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                :

                "Loading....."
            }
        </>
    )
}
