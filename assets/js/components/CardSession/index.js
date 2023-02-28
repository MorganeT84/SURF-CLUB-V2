import React from 'react';

import './card.scss'

export const CardSession = () => {
  return (
    <div className='card-session'>
      <div className='card'>
        <img src='/images/bg-body.jpeg' alt='' title='' className='card-img-top' />
        <div className='card-body'>
          <h5 className='card-title'>Sessions Surf</h5>
          <p className='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <div className="d-grid gap-2 col-6 mx-auto">
            <button className="btn btn-primary" type="button">Go it !</button>
          </div>
        </div>
      </div>

      <div className='card'>
        <img src='/images/bg-body.jpeg' alt='' title='' className='card-img-top' />
        <div className='card-body'>
          <h5 className='card-title'>Sessions Paddle</h5>
          <p className='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <div className="d-grid gap-2 col-6 mx-auto">
            <button className="btn btn-primary" type="button">Go it !</button>
          </div>
        </div>
      </div>

      <div className='card'>
        <img src='/images/bg-body.jpeg' alt='' title='' className='card-img-top' />
        <div className='card-body'>
          <h5 className='card-title'>Sessions Yoga</h5>
          <p className='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <div className="d-grid gap-2 col-6 mx-auto">
            <button className="btn btn-primary" type="button">Go it !</button>
          </div>
        </div>
      </div>

      <div className='card'>
        <img src='/images/bg-body.jpeg' alt='' title='' className='card-img-top' />
        <div className='card-body'>
          <h5 className='card-title'>Sessions Yoga/Paddle</h5>
          <p className='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <div className="d-grid gap-2 col-6 mx-auto">
            <button className="btn btn-primary" type="button">Go it !</button>
          </div>
        </div>
      </div>

    </div>


  )
}

