const functions = require('firebase-functions');
                                    const admin = require('firebase-admin');
                                    admin.initializeApp({
                                      credential: admin.credential.applicationDefault(),
                                      databaseURL: 'https://fir-hotel-7c607.firebaseio.com/'
                                    });
                                    
                                    exports.sendNotification = functions.database.ref('/notifications/{u_id}/{notifi_id}').onWrite((data, context) => {
                                    
                                         const user_id = context.params.u_id;
                                         const notification_id = context.params.notifi_id;
                                    
                                        var Ref_for_delete = admin.database().ref(`/notifications/${user_id}/${notification_id}`);
                                    
                                        console.log('We have a notification from : ', user_id);
                                        
                                          
                                        const username = admin.database().ref(`/notifications/${user_id}/${notification_id}/name`).once('value');
                                        const userpic = admin.database().ref(`/notifications/${user_id}/${notification_id}/picture`).once('value');
                                        const message = admin.database().ref(`/notifications/${user_id}/${notification_id}/message`).once('value');
                                        const receiver_id = admin.database().ref(`/notifications/${user_id}/${notification_id}/receiverid`).once('value');
                                        const action_type = admin.database().ref(`/notifications/${user_id}/${notification_id}/action_type`).once('value');
                                        const deviceToken = admin.database().ref(`/notifications/${user_id}/${notification_id}/token`).once('value');
                                       
                                    
                                        return Promise.all([username,userpic,message,receiver_id,action_type,deviceToken]).then(result => {
                                    
                                          const userName = result[0].val();
                                          const pic = result[1].val();
                                          const msg = result[2].val();
                                          const rid = result[3].val();
                                          const actiontype = result[4].val();   
                                          const token_id = result[5].val();
                                    
                                      
                                          const payload = {
                                            
                                           notification : {
                                           
                                              title : `${userName}`,
                                              body: `${msg}`,
                                             sound : "default"
                                           },
                                         
                                            data : {
                                             title : `${userName}`,
                                              body: `${msg}`,
                                              icon: `${pic}`,
                                              senderid: `${user_id}`,
                                              receiverid: `${rid}`,
                                              action_type: `${actiontype}`
                                            }
                                            
                                          };
                                    
                                    
                                         Ref_for_delete.remove();
                                          
                                         return admin.messaging().sendToDevice(token_id, payload);
                                    
                                    
                                          });
                                    
                                    
                                        });	
                                