package com.example.snakegame;

import android.content.Context;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Paint;
import android.graphics.Point;
import android.util.Log;
import android.view.MotionEvent;
import android.view.SurfaceHolder;
import android.view.SurfaceView;
import android.widget.Toast;

import java.util.Random;

/**
 * Created by USER on 10-Oct-17.
 */

public class SnakeDemo extends SurfaceView implements Runnable {

    Thread t = null;
    boolean flag = false;
    int swidth, sheight;

    // The current m_Score

    // The location in the grid of all the segments
    private int[] m_SnakeXs;
    private int[] m_SnakeYs;

    // How long is the snake at the moment
    private int m_SnakeLength;

    // Where is the mouse
    private int m_MouseX;
    private int m_MouseY;

    // The size in pixels of a snake segment
    private int m_BlockSize;

    // The size in segments of the playable area
    private final int NUM_BLOCKS_WIDE = 40;

    private int m_NumBlocksHigh; // determined dynamically

    enum direction {UP, RIGHT, DOWN, LEFT};

    direction m_direction = direction.RIGHT;

    private long m_NextFrameTime;

    // Update the game 10 times per second
    //private final long FPS = 10;

    // There are 1000 milliseconds in a second
    //private final long MILLIS_IN_A_SECOND = 1000;

    // We will draw the frame much more often

    // The current m_Score

    private int m_Score;
    SurfaceHolder sh;
    Canvas c;
    Paint p;

   Context ctx;
    SnakeDemo(Context c, int width, int height) {
        super(c);
        ctx=c;

        swidth = width;
        sheight = height;

        //Determine the size of each block/place on the game board
        m_BlockSize = swidth / NUM_BLOCKS_WIDE;


        // How many blocks of the same size will fit into the height
        m_NumBlocksHigh = sheight / m_BlockSize;


        sh = getHolder();
        p = new Paint();

        m_SnakeXs = new int[200];
        m_SnakeYs = new int[200];

        startGame();

    }

    public void startGame() {

        Log.d("Hello","In StartGame");
        // Start with just a head, in the middle of the screen
        m_SnakeLength = 1;
        m_SnakeXs[0] = NUM_BLOCKS_WIDE / 2;
        m_SnakeYs[0] = m_NumBlocksHigh / 2;

        // And a mouse to eat
        spawnMouse();

        // Reset the m_Score
        m_Score = 0;

        // Setup m_NextFrameTime so an update is triggered immediately
        m_NextFrameTime = System.currentTimeMillis();

    }

    public void spawnMouse() {

        Log.d("Hello","In span Mouse");
        m_MouseX = 1+ (int)(Math.random()*(NUM_BLOCKS_WIDE-1));

        m_MouseY = 1+ (int)(Math.random()*(m_NumBlocksHigh-1));
    }


    private void eatMouse() {

        Log.d("Hello","In eat Mouse");
        //  Got one! Squeak!!
        // Increase the size of the snake
        m_SnakeLength++;
        //replace the mouse
        spawnMouse();
        //add to the m_Score
        m_Score = m_Score + 1;
    }

    private void moveSnake() {
        // Move the body
        Log.d("Hello","In MOveSnake");

        for (int i = m_SnakeLength; i > 0; i--) {
            // Start at the back and move it
            // to the position of the segment in front of it
            m_SnakeXs[i] = m_SnakeXs[i - 1];
            m_SnakeYs[i] = m_SnakeYs[i - 1];

            // Exclude the head because
            // the head has nothing in front of it
        }

        // Move the head in the appropriate m_Direction
        switch (m_direction) {
            case UP:
                m_SnakeYs[0]--;
                break;

            case RIGHT:
                m_SnakeXs[0]++;
                break;

            case DOWN:
                m_SnakeYs[0]++;
                break;

            case LEFT:
                m_SnakeXs[0]--;
                break;
        }
    }

    @Override
    public void run()
    {

        while (flag)
        {
            Log.d("Hello","In run");
            if(checkForUpdate())
            {
                updateGame();
                drawGame();
            }
        }
    }

    public void pause() {
        flag = false;
        try {
            t.join();
        } catch (InterruptedException e) {
            // Error
        }
    }

    public void resume() {
        flag = true;
        t = new Thread(this);
        t.start();
    }



    public boolean checkForUpdate() {
        Log.d("Hello","In check for update");

        // Are we due to update the frame
        if(m_NextFrameTime <= System.currentTimeMillis()){
            // Tenth of a second has passed

            // Setup when the next update will be triggered
            m_NextFrameTime =System.currentTimeMillis() + 30;

            // Return true so that the update and draw
            // functions are executed
            return true;
        }
        return false;
    }

    public void updateGame() {

        Log.d("Hello","In updategame");
        // Did the head of the snake touch the mouse?
        if (m_SnakeXs[0] == m_MouseX && m_SnakeYs[0] == m_MouseY) {
            eatMouse();
        }

        moveSnake();

        if (detectDeath()) {
            //start again
            startGame();
        }
    }

    public void drawGame()
    {
        // Prepare to draw
        Log.d("Hello","In draw Game");
        if (sh.getSurface().isValid()) {

            c = sh.lockCanvas();

            // Clear the screen with my favorite color
            c.drawColor(Color.GREEN);

            // Set the color of the paint to draw the snake and mouse with
            p.setColor(Color.RED);

            // Choose how big the score will be
            p.setTextSize(50);
            c.drawText("Score:" + m_Score, 10, 30, p);

            //Draw the snake
            for (int i = 0; i < m_SnakeLength; i++) {
                c.drawRect(m_SnakeXs[i] * m_BlockSize,
                        (m_SnakeYs[i] * m_BlockSize),
                        (m_SnakeXs[i] * m_BlockSize) + m_BlockSize,
                        (m_SnakeYs[i] * m_BlockSize) + m_BlockSize,
                        p);
            }

            //draw the mouse
            c.drawRect(m_MouseX * m_BlockSize,
                    (m_MouseY * m_BlockSize),
                    (m_MouseX * m_BlockSize) + m_BlockSize,
                    (m_MouseY * m_BlockSize) + m_BlockSize,
                    p);

            // Draw the whole frame
            sh.unlockCanvasAndPost(c);
        }
    }



    private boolean detectDeath() {
        // Has the snake died?
        Log.d("Hello","In Detect Death");
        boolean dead = false;

        // Hit a wall?
        if (m_SnakeXs[0] == -1) dead = true;
        if (m_SnakeXs[0] >= NUM_BLOCKS_WIDE) dead = true;
        if (m_SnakeYs[0] == -1) dead = true;
        if (m_SnakeYs[0] == m_NumBlocksHigh) dead = true;

        // Eaten itself?
        for (int i = m_SnakeLength - 1; i > 0; i--) {
            if ((i > 4) && (m_SnakeXs[0] == m_SnakeXs[i]) && (m_SnakeYs[0] == m_SnakeYs[i])) {
                dead = true;
            }
        }

        return dead;
    }


    @Override
    public boolean onTouchEvent(MotionEvent event) {


        switch (event.getAction() & MotionEvent.ACTION_MASK)
        {
            case MotionEvent.ACTION_UP:
                if (event.getX() >= swidth / 2) {

                    switch(m_direction){
                        case UP:
                            m_direction = direction.RIGHT;
                            break;
                        case RIGHT:
                            m_direction = direction.DOWN;
                            break;
                        case DOWN:
                            m_direction = direction.LEFT;
                            break;
                        case LEFT:
                            m_direction = direction.UP;
                            break;
                    }
                } else {
                    switch(m_direction){
                        case UP:
                            m_direction = direction.LEFT;
                            break;
                        case LEFT:
                            m_direction = direction.DOWN;
                            break;
                        case DOWN:
                            m_direction = direction.RIGHT;
                            break;
                        case RIGHT:
                            m_direction = direction.UP;
                            break;
                    }
                }
        }
        return true;
    }
}

