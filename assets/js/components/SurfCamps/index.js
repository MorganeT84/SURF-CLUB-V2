import React from 'react';

import './surfcamps.scss';

export default function SurfCamps() {
  return (
    <div className='main'>
      <h1>Surf-camps</h1>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
        <img src="/images/bg-body.jpeg" class="card-img-bottom" alt="..." />
      </div>
    </div>
  )
}
