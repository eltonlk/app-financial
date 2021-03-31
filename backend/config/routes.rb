Rails.application.routes.draw do
  resources :tags
  resources :bank_accounts

  get 'current_user', to: "sessions#current_user"

  post 'sign_in', to: 'sessions#sign_in'
  post 'sign_up', to: 'sessions#sign_up'
end
