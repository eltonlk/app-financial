Rails.application.routes.draw do
  # For details on the DSL available within this file, see https://guides.rubyonrails.org/routing.html

  post 'sign_in', to: 'sessions#sign_in'
  post 'sign_up', to: 'sessions#sign_up'

  # get "/auto_login", to: "users#auto_login"
end
