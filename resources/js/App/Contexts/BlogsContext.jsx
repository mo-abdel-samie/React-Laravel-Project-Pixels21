import React, { useReducer } from "react";
import {Api} from "../Api";

import * as TYPES from "./types";

const BlogsContext = React.createContext();

const BlogsState = (props) => {
  const initialState = {
    loading: false,
    blogs: [],
    blog: {},
  };

  const [state, dispatch] = useReducer(blogReducer, initialState);

  const getAllBlogs = async () => {
    dispatch({ type: TYPES.SET_LOADING });
    const { data } = await Api.get(`/blogs`);
    console.log(data);
    dispatch({ type: TYPES.GET_ALL_BLOGS, payload: data });
  };
  const getBlogById = async (id) => {
    dispatch({ type: TYPES.SET_LOADING });
    const { data } = await Api.get(`/blogs/get-project-byId/${id}`);
    console.log(data);
    dispatch({ type: TYPES.GET_BLOG_BY_ID, payload: data });
  };


  return (
    <BlogsContext.Provider
      value={{
        blogs: state.blogs,
        blog: state.blog,
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
        blogs: action.payload ? action.payload : [],
        loading: false,
      };
    case TYPES.GET_BLOG_BY_ID:
      return {
        ...state,
        blog: action.payload ? action.payload : {},
        loading: false,
      };
    default:
      return state;
  }
};

export { BlogsContext, BlogsState };