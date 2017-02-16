char tab_Bones_ID[14][16] = { "Body", "Head", "Left_Shoulder" , "Left_Upperarm" , "Left_Hand" , "Right_Shoulder" , "Right_Upperarm" , "Right_Hand" , "Left_Thigh" , "Left_Shin" ,"Left_Foot", "Right_Thigh" , "Right_Shin", "Right_Foot" };
float tab_Bones_KF_a[14][10] = { 
    { 0.00 , 50 , 0 , 0.00 , 0.00 , 30.00 , -70.00 , -80.00 , 0.00 , - , 120.00 }  , 
    { 0.00 , 0.00 , 60.00 , 0.00 , 0.00 , 30.00 , -70.00 , 0.00 , -80.00 , -120.00 }  , 
    { 0.00 , 0.00 , 0.00 , 60.00 , 0.00 , 30.00 , -30.00 , 0.00 , 30.00 , -900.00 }  , 
    { 39.221 , 35.204 , 35.193 , 0.00 , -80.00 , -30.00 , -60.00 , -60.00 , 0.00 , -30.00 }  , 
    { 73.412 , 73.412 , 73.462 , 0.00 , 0.00 , 30.00 , -70.00 , -80.00 , 0.00 , - , 120.00 }  , 
    { 0.00 , 0.00 , 60.00 , 0.00 , 0.00 , 30.00 , -70.00 , 0.00 , -80.00 , -120.00 }  , 
    { 0.00 , 0.00 , 0.00 , 60.00 , 0.00 , 30.00 , -30.00 , 0.00 , 30.00 , -900.00 }  , 
    { 0.00 , 0.00 , 0.00 , 0.00 , -80.00 , -30.00 , -60.00 , -60.00 , 0.00 , -30.00 }  , 
    { 0.00 , 50.00 , 0.00 , 0.00 , 0.00 , 30.00 , -70.00 , -80.00 , 0.00 , - , 120.00 }  , 
    { 0.00 , 0.00 , 60.00 , 0.00 , 0.00 , 30.00 , -70.00 , 0.00 , -80.00 , -120.00 } ,
    { 0.00 , 0.00 , 0.00 , 60.00 , 0.00 , 30.00 , -30.00 , 0.00 , 30.00 , -900.00 }  , 
    { 0.00 , 0.00 , 0.00 , 0.00 , -80.00 , -30.00 , -60.00 , -60.00 , 0.00 , -30.00 }  , 
    { 0.00 , 50.00 , 0.00 , 0.00 , 0.00 , 30.00 , -70.00 , -80.00 , 0.00 , - , 120.00 }  , 
    { 0.00 , 0.00 , 60.00 , 0.00 , 0.00 , 30.00 , -70.00 , 0.00 , -80.00 , -120.00 } 
 }; 
float tab_Bones_KF_x[14][10] = { 
    { 1.00 , 1.00 , 1 , 1.00 , 1.00 , 1.00 , 0.00 , 0.00 , 0.00 , 0.00 }  , 
    { 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 0.00 , 0.00 , 0.00 , 0.00 }  , 
    { 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 }  , 
    { -0.921 , -0.92 , -0.925 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 }  , 
    { 0 , 0.677 , -0.509 , 1.00 , 1.00 , 1.00 , 0.00 , 0.00 , 0.00 , 0.00 }  , 
    { 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 0.00 , 0.00 , 0.00 , 0.00 }  , 
    { 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 }  , 
    { 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 }  , 
    { 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 0.00 , 0.00 , 0.00 , 0.00 }  , 
    { 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 0.00 , 0.00 , 0.00 , 0.00 }  ,
    { 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 }  , 
    { 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 }  , 
    { 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 0.00 , 0.00 , 0.00 , 0.00 }  , 
    { 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 1.00 , 0.00 , 0.00 , 0.00 , 0.00 } 
 }; 
float tab_Bones_KF_y[14][10] = { 
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 }  , 
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 }  , 
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 }  , 
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 }  , 
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 }  , 
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 }  , 
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 }  , 
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 }  , 
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 }  , 
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 }  ,
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 }  , 
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 }  , 
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 }  , 
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 }  
 }; 
float tab_Bones_KF_z[14][10] = { 
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 1.00 , 1.00 , 1.00 , 1.00 }  , 
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 1.00 , 1.00 , 1.00 , 1.00 }  , 
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 }  , 
    { 0.99 , 0.99 , 0.99 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 }  , 
    { 0.99 , 0.99 , 0.99 , 0.00 , 0.00 , 0.00 , 1.00 , 1.00 , 1.00 , 1.00 }  , 
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 1.00 , 1.00 , 1.00 , 1.00 }  , 
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 }  , 
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 }  , 
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 1.00 , 1.00 , 1.00 , 1.00 }  , 
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 1.00 , 1.00 , 1.00 , 1.00 }  ,
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 }  , 
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 }  , 
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 1.00 , 1.00 , 1.00 , 1.00 }  , 
    { 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 0.00 , 1.00 , 1.00 , 1.00 , 1.00 } 
 }; 
