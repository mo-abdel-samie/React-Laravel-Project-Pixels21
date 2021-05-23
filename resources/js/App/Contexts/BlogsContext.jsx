import React, { useReducer } from "react";
import {Api} from "../Api";

import * as TYPES from "./types";

const BlogsContext = React.createContext();

const BlogsState = (props) => {
  const initialState = {
    loading: false,
    articles: [],
    article: {},
  };

  const [state, dispatch] = useReducer(blogReducer, initialState);

  const getAllBlogs = async () => {
    dispatch({ type: TYPES.SET_LOADING });
    const { data } = await Api.get(`/blogs/all`);
      console.log("blogs");
      console.log(data.blogs);
    dispatch({ type: TYPES.GET_ALL_BLOGS, payload: data.blogs });
  };
  const getBlogById = async (id) => {
    dispatch({ type: TYPES.SET_LOADING });
    const { data } = await Api.get(`/blogs/get-blog-byId/${id}`);
    console.log("blog");
    console.log(data.blog);
    dispatch({ type: TYPES.GET_BLOG_BY_ID, payload: data.blog });
  };


  return (
    <BlogsContext.Provider
      value={{
        articles: state.articles,
        article: state.article,
        loading: state.loading,
        getAllBlogs,
        getBlogById,
      }}
    >
      {props.children}
    </BlogsContext.Provider>
  );
};

const blogReducer = (state, action) => {
  switch (action.type) {
    case TYPES.SET_LOADING:
      return {
        ...state,
        loading: true
      };

    case TYPES.GET_ALL_BLOGS:
      return {
        ...state,
        articles: action.payload ? action.payload : [],
        loading: false,
      };
    case TYPES.GET_BLOG_BY_ID:
      return {
        ...state,
        article: action.payload ? action.payload : {},
        loading: false,
      };
    default:
      return state;
  }
};

export { BlogsContext, BlogsState };
