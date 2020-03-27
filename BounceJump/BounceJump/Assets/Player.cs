using System.Collections;
using System.Collections.Generic;
using UnityEngine;

[RequireComponent(typeof(Rigidbody2D))]
public class Player : MonoBehaviour {

	public float movementSpeed = 10f;

	Rigidbody2D rb;

	float movement = 0f;

	// Use this for initialization
	void Start () {
		rb = GetComponent<Rigidbody2D>();
	}

    // Update is called once per frame
    void Update()
    {
        if (Input.touchCount > 0)
        {
            Touch touch = Input.GetTouch(0);
            Vector3 touch_pos = Camera.main.ScreenToWorldPoint(touch.position);

            if (touch_pos.x > 0)
            {
                transform.position += Vector3.right * movementSpeed * Time.deltaTime;

            }
            else if (touch_pos.x < 0)
            {
                transform.position += Vector3.left * movementSpeed * Time.deltaTime;
            }
        }
    }

        void FixedUpdate()
	{
		Vector2 velocity = rb.velocity;
		velocity.x = movement;
		rb.velocity = velocity;
	}
}
