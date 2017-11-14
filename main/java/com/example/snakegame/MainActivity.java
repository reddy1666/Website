package com.example.snakegame;

import android.graphics.Point;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.DisplayMetrics;
import android.view.Display;
import android.view.View;

public class MainActivity extends AppCompatActivity {

    SnakeDemo sd ;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);


        //general information about a display, such as its size, density.
        DisplayMetrics dm = getResources().getDisplayMetrics();

        //find out the width and height of the screen
        int width = dm.widthPixels;
        int height = dm.heightPixels;

        sd = new SnakeDemo(this,width,height);

        // Make snakeDemo the default view of the Activity
        setContentView(sd);
    }


    @Override
    protected void onResume() {
        super.onResume();
        sd.resume();
    }


    @Override
    protected void onPause() {
        super.onPause();
        sd.pause();
    }
}
