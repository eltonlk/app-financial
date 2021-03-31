class SessionsController < ApplicationController

  def sign_in
    @user = User.find_by username: params.require(:username)

    if @user && @user.authenticate(params.require(:password))
      token = encode_token user_id: @user.id

      render json: { user: @user, token: token }
    else
      render json: { error: "Invalid username or password" }
    end
  end

  def sign_up
    @user = User.new user_params

    if @user.save
      token = encode_token({user_id: @user.id})

      render json: { user: @user, token: token }
    else
      render json: { error: "Invalid username or password" }
    end
  end

  private
    def user_params
      params.permit(:username, :password)
    end

end
