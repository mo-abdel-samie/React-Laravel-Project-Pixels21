import React from 'react'

export default function Content(props) {
    return (

        <div className="content-wrapper">
            {props.contents.map((content,index) => (
                <div key={index} className="news-card">
                    <a href={`#sec${index}`} className="news-card__card-link"></a>
                    <img src={`/images/MagazineImg/${content.img}`}  alt="Pixels Articals" className="news-card__image"/>
                    <div className="news-card__text-wrapper">
                        <h2 className="news-card__title">{content.title}</h2>
                        <div className="news-card__details-wrapper">
                            <p className="news-card__excerpt">
                                {content.summary}
                            </p>
                        </div>
                    </div>
                </div>
            ))}

        </div>
    )
}
