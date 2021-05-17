<?php

/**
 * @api {get} api/user/get/:id Get user by id
 * 
 * @apiHeader{json} Header {"Content-Type": "application/json", "Authorization": Bearer {token}}
 * 
 * @apiName GetUser
 * @apiVersion 2.0.0
 * @apiGroup User
 *
 * @apiParam {Number} id    Users unique ID.
 *
 * @apiSuccess {String} status      Request status.
 * @apiSuccess {String} id          ID of the User.
 * @apiSuccess {String} email       Email of the User.
 * @apiSuccess {String} name        Name of the User.
 * 
 * @apiSuccessExample Return Example:
 *    {
 *       "status": "success",
 *       "data": {
 *          "id": "9",
 *          "email": "phpapirest@gmail.com",
 *          "name": "PHP API REST"
 *       }
 *    }
 */

 /**
 * @api {get} api/user/get/ Get all users
 * 
 * @apiHeader{json} Header {"Content-Type": "application/json", "Authorization": Bearer {token}}
 * 
 * @apiName GetUser
 * @apiGroup User
 *
 * @apiSuccess {String} status      Request status.
 * @apiSuccess {String} id          ID of the User.
 * @apiSuccess {String} email       Email of the User.
 * @apiSuccess {String} name        Name of the User.
 * 
 * @apiSuccessExample Return Example:
 *    {
 *       "status": "success",
 *       "data": {
 *          "id": "9",
 *          "email": "phpapirest@gmail.com",
 *          "name": "PHP API REST"
 *       }
 *    }
 */

  /**
 * @api {post} api/user/create Creates a new user
 * 
 * @apiHeader{json} Header {"Content-Type": "application/json", "Authorization": Bearer {token}}
 * 
 * @apiName Create
 * @apiGroup User
 *
 * @apiParam {String} name      Name of the User.
 * @apiParam {String} email     Email of the User.
 * @apiParam {String} password  Password of the User. 
 *
 * @apiSuccess {String} status      Request status.
 * @apiSuccess {String} data        Request message.
 * 
 * @apiSuccessExample Request Example:
 *    {
 *        "name"     :   "PHP API REST",
 *        "email"    :   "phpapirest@gmail.com",
 *        "password" :   "abcde1234"
 *    }
 * 
 * @apiSuccessExample Return Example:
 *    {
 *       "status" : "success",
 *       "data"   : "User successfully inserted."
 *    }
 */

  /**
 * @api {post} api/user/login Log into the system
 * 
 * @apiHeader{json} Header {"Content-Type": "application/json", "Authorization": Bearer {token}}
 * 
 * @apiName Login
 * @apiGroup User
 *
 * @apiParam {String} email     Email of the User.
 * @apiParam {String} password  Password of the User. 
 *
 * @apiSuccess {String} status      Request status.
 * @apiSuccess {String} message     Request message.
 * @apiSuccess {String} token       Bearer token.
 * @apiSuccess {String} email       Email of user.
 * 
 * @apiSuccessExample Request Example:
 *    {
 *        "email"    :   "phpapirest@gmail.com",
 *        "password" :   "abcde1234"
 *    }
 * 
 * @apiSuccessExample Return Example:
 *    {
 *        "status": "success",
 *        "data": {
 *           "message": "Successfully logged in.",
 *           "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.NsaWVudCIsImlJpYSBQZXJlcyJ9fQ.ekeJwAwycGRTaS9DyL10dFy5JhZZwsagx8l-Z_MOpcA",
 *           "email": "phpapirest@gmail.com"
 *        }
 *    }
 */

  /**
 * @api {put} api/user/update Update user
 * 
 * @apiHeader{json} Header {"Content-Type": "application/json", "Authorization": Bearer {token}}
 * 
 * @apiName Update
 * @apiGroup User
 *
 * @apiParam {String} id        ID of the User - REQUIRED.
 * @apiParam {String} name      Name of the User.
 * @apiParam {String} email     Password of the User. 
 * @apiParam {String} password  Password of the User. 
 *
 * @apiSuccess {String} status      Request status.
 * @apiSuccess {String} data        Request message.
 * 
 * @apiSuccessExample Request Example:
 *    {
 *        "id"       :   "9",
 *        "name"     :   "PHP API REST"
 *    }
 * 
 * @apiSuccessExample Return Example:
 *    {
 *        "status" : "success",
 *        "data"   : "User successfully updated."
 *    }
 */

  /**
 * @api {delete} api/user/delete Delete user
 * 
 * @apiHeader{json} Header {"Content-Type": "application/json", "Authorization": Bearer {token}}
 * 
 * @apiName Delete
 * @apiGroup User
 *
 * @apiParam {String} id        ID of the User - REQUIRED.
 *
 * @apiSuccess {String} status      Request status.
 * @apiSuccess {String} data        Request message.
 * 
 * @apiSuccessExample Request Example:
 *    {
 *        "id"       :   "9",
 *    }
 * 
 * @apiSuccessExample Return Example:
 *    {
 *        "status" : "success",
 *        "data"   : "User successfully deleted."
 *    }
 */