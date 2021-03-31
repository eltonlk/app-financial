Rails.application.routes.draw do
  resources :bank_accounts

  post 'sign_in', to: 'sessions#sign_in'
  post 'sign_up', to: 'sessions#sign_up'

  # get "/auto_login", to: "users#auto_login"
end
