import React, {useContext, useEffect, useState} from 'react'
import { useParams, withRouter } from 'react-router-dom';
import Header from './Header';
import  Aos  from 'aos';
import {BlogsContext} from "../../../Contexts/BlogsContext";
import {Col, Row, Spinner, Container} from "react-bootstrap";

function Blog(props) {

  // let { id } = useParams();
  const {loading, article, getBlogById} = useContext(BlogsContext);

  useEffect(() => {
    Aos.init({duration: 2000});
  }, []);

  useEffect(() => {
    if(props.match.params.id) {
      getBlogById(props.match.params.id);
    }
  }, [props.match.params.id]);


  return (
    <>
      <Header />

      {loading && (
        <Col xs={12}>
          <Spinner />
        </Col>
      )}

      {!article && !loading ? (
        <Col xs={12}>
          <h2 className="not-found text-danger text-center"> Article Not Found </h2>
        </Col>
      ):(
        <Container className="pt-5">
          <Row className="">
            <Col lg={8} className="">
              <div className="project_main_details">
                <h2>{article.title}</h2>
                <small>{article.author}</small>
                <p className="mb-3">
                  {article.subtitle}
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
                  {article.content}
                </p>
              </div>

            </Col>
          </Row>
        </Container>
      )}
    </>
  )
}

export default withRouter(Blog);
