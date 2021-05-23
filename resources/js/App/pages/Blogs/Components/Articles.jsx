import React, {useContext, useEffect, useState} from 'react'
import Aos from "aos";
import { Link } from 'react-router-dom';
import {Col, Container, Row, Spinner} from "react-bootstrap";
import {BlogsContext} from "../../../Contexts/BlogsContext";


export default function Articles() {

    const [lastArticle, setLastArticle] = useState(0);

    const { loading, articles, getAllBlogs } = useContext(BlogsContext);

    useEffect(() => {
        Aos.init({duration: 2000});
        getAllBlogs();
        setLastArticle( articles[articles.length-1]);
    }, []);

    return (
        <section className="articles overflow-hidden">
            <Container className = " container">
                {loading && (
                    <Col xs={12}>
                        <Spinner />
                    </Col>
                )}

                {articles.length === 0 && !loading ? (
                    <Col xs={12}>
                        <h2 className="not-found text-danger text-center"> Articles Not Found </h2>
                    </Col>
                ) : (
                  <>
                  {/*<Row className="">*/}
                  {/*    <Col xs={12} className="py-3 pt-5">*/}
                  {/*        <div className="pixels-word" style={{top:"-3px"}}>Pixels</div>*/}
                  {/*        <h2>Articles</h2>*/}
                  {/*    </Col>*/}

                  {/*    <Col lg={6} data-aos="fade-right" className = " ">*/}
                  {/*        <img alt="pixels article" src={`/images/${lastArticle.image}`} className = "m-2 img-fluid rounded" />*/}
                  {/*    </Col>*/}

                  {/*    <Col lg={6} data-aos="fade-left" className = "d-flex pl-5 align-items-center">*/}
                  {/*        <div>*/}
                  {/*            <h3>{lastArticle.title} </h3>*/}
                  {/*            <small>Author : {lastArticle.author} </small>*/}
                  {/*            <p>*/}
                  {/*                {lastArticle.subtitle}*/}
                  {/*            </p>*/}
                  {/*            <div className = "mt-4">*/}
                  {/*                <Link to={`/blog/${lastArticle.id}`} className="btn btn-outline-info rounded-pill">Read More</Link>*/}
                  {/*            </div>*/}
                  {/*        </div>*/}
                  {/*    </Col>*/}
                  {/*</Row>*/}

                  <Row className="row overflow-hidden py-3">
                      <Col xs={12}>
                          <h3>Latest Articles</h3>
                      </Col>

                      {articles.map((article , index)=>(
                          <Col lg={4} key={index} data-aos="fade-up">
                              <div className="card">
                                  <img alt="pixels article" className="card-img-top" src={`./${article.img}`} />
                                  <div className="card-body">
                                      <h5 className="card-title">{article.title}</h5>
                                      <small>author : {article.author}</small>
                                      <p className="card-text">
                                          {article.subtitle}
                                      </p>
                                      <div className = "mt-4">
                                          <Link to={`/blog/${article.id}`} className="btn btn-outline-info rounded-pill">Read More</Link>
                                      </div>
                                  </div>
                              </div>
                          </Col>
                      ))}
                  </Row>
                  </>
                )}

            </Container>
        </section>
    )
}
